// Verificar si ya existe una instancia del controlador
if (typeof window.speechController === 'undefined') {
    // Controlador de reconocimiento de voz
    class SpeechRecognitionController {
        constructor() {
            this.recognition = null;
            this.isListening = false;
            this.currentInput = null;
            this.currentTranscript = '';
            this.init();
        }

        init() {
            // Verificar compatibilidad del navegador
            if (!('webkitSpeechRecognition' in window)) {
                console.warn('El reconocimiento de voz no es compatible con este navegador');
                return;
            }

            // Configurar el reconocimiento de voz
            this.recognition = new webkitSpeechRecognition();
            this.recognition.continuous = true;  // Seguir escuchando continuamente
            this.recognition.interimResults = true;  // Obtener resultados intermedios
            this.recognition.lang = 'es-ES';
            this.recognition.maxAlternatives = 1;  // Solo una alternativa de transcripción
            this.recognition.interimResults = true;  // Permitir resultados intermedios
            this.recognition.continuous = true;  // Continuar escuchando hasta que se detenga explícitamente
            this.recognition.interimResults = true;  // Mostrar resultados provisionales

            // Manejador de resultados
            this.recognition.onresult = (event) => {
                let interimTranscript = '';
                let finalTranscript = '';
                
                // Procesar todos los resultados
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    const transcript = event.results[i][0].transcript;
                    if (event.results[i].isFinal) {
                        finalTranscript += transcript + ' ';
                    } else {
                        interimTranscript += transcript;
                    }
                }
                
                // Actualizar el campo de entrada con el texto transcrito
                if (this.currentInput) {
                    const currentValue = $(this.currentInput).val() || '';
                    const newValue = finalTranscript || interimTranscript;
                    
                    // Solo actualizar si hay un cambio para evitar parpadeos
                    if (newValue.trim() !== currentValue.trim()) {
                        $(this.currentInput).val(newValue);
                        // Disparar evento de cambio para otros listeners
                        $(this.currentInput).trigger('input').trigger('change');
                    }
                }
                
                // Mantener el último texto transcrito
                this.currentTranscript = finalTranscript || interimTranscript;
            };

            this.recognition.onerror = (event) => {
                console.error('Error en el reconocimiento de voz:', event.error);
                this.isListening = false;
                this.updateButtonState();
                
                // Intentar reiniciar después de un error
                if (event.error !== 'no-speech' && event.error !== 'aborted') {
                    setTimeout(() => {
                        if (this.currentInput && this.isListening) {
                            this.startListening(this.currentInput);
                        }
                    }, 1000);
                }
            };

            this.recognition.onend = () => {
                if (this.isListening) {
                    console.log('Reconocimiento finalizado, reiniciando...');
                    setTimeout(() => {
                        try {
                            if (this.isListening) {
                                this.recognition.start();
                                console.log('Reconocimiento reiniciado');
                            }
                        } catch (e) {
                            console.error('Error al reiniciar el reconocimiento:', e);
                            this.isListening = false;
                            this.updateButtonState();
                        }
                    }, 100);
                }
            };
        }

        startListening(inputElement) {
            if (!this.recognition || this.isListening) return;

            this.currentInput = inputElement;
            this.currentTranscript = $(inputElement).val() || '';
            this.isListening = true;
            this.updateButtonState();
            
            try {
                this.recognition.start();
            } catch (error) {
                console.error('Error al iniciar el reconocimiento de voz:', error);
                this.isListening = false;
                this.updateButtonState();
            }
        }

        stopListening() {
            if (this.recognition && this.isListening) {
                this.isListening = false;
                this.recognition.stop();
                this.updateButtonState();
                
                // Insertar el texto transcrito final
                if (this.currentInput && this.currentTranscript) {
                    $(this.currentInput).val(this.currentTranscript);
                    $(this.currentInput).trigger('change');
                }
                
                this.currentTranscript = '';
            }
        }

        updateButtonState() {
            const buttons = document.querySelectorAll('.btn-voice');
            buttons.forEach(button => {
                const icon = button.querySelector('i');
                if (button === this.currentInput?.nextElementSibling && this.isListening) {
                    button.classList.add('bg-gradient-danger');
                    button.classList.remove('btn-outline-secondary');
                    if (icon) {
                        icon.className = 'fas fa-microphone-slash';
                        button.title = 'Soltar para terminar';
                    }
                } else {
                    button.classList.remove('bg-gradient-danger');
                    button.classList.add('btn-outline-secondary');
                    if (icon) {
                        icon.className = 'fas fa-microphone';
                        button.title = 'Mantén presionado para hablar';
                    }
                }
            });
        }
    }

    // Crear instancia global
    window.speechController = new SpeechRecognitionController();

    // Función para verificar si un campo debe ser excluido
    function shouldExcludeInput(input) {
        // Lista de identificadores, nombres y clases que deben ser excluidos
        const excludePatterns = [
            'buscar', 'nombres', 'apellidos', 'nombre', 'apellido', 
            'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido',
            'dni', 'documento', 'cedula', 'ruc', 'telefono', 'celular', 'email',
            'fecha_nacimiento', 'edad', 'direccion', 'codigo_postal', 'ciudad', 'pais',
            'medicamento', 'medicina', 'farmaco', 'droga', 'medicina', 'medicamento',
            'medicamentos', 'medicinas', 'farmacos', 'drogas'
        ];
        
        const inputId = (input.id || '').toLowerCase();
        const inputName = (input.name || '').toLowerCase();
        const inputPlaceholder = (input.placeholder || '').toLowerCase();
        const inputClass = (input.className || '').toLowerCase();
        const inputParentText = (input.closest('label, div, td, th, tr')?.textContent || '').toLowerCase();
        
        // Verificar si el input coincide con algún patrón de exclusión
        return (
            excludePatterns.some(pattern => inputId.includes(pattern)) ||
            excludePatterns.some(pattern => inputName.includes(pattern)) ||
            excludePatterns.some(pattern => inputParentText.includes(pattern)) ||
            inputPlaceholder.includes('nombre') ||
            inputPlaceholder.includes('apellido') ||
            inputPlaceholder.includes('dni') ||
            inputPlaceholder.includes('documento') ||
            inputPlaceholder.includes('tel') ||
            inputPlaceholder.includes('celular') ||
            inputPlaceholder.includes('email') ||
            inputPlaceholder.includes('medicamento') ||
            inputPlaceholder.includes('medicina') ||
            inputClass.includes('no-voice') ||
            input.readOnly ||
            input.disabled ||
            // Excluir si está dentro de un contenedor de medicamentos
            input.closest('[id*="medic"], [class*="medic"], [id*="farmac"], [class*="farmac"]') !== null
        );
    }

    // Función para inicializar los botones de voz
    function initVoiceButtons() {
        // Agregar estilos si no existen
        if (!document.getElementById('voice-recognition-styles')) {
            const style = document.createElement('style');
            style.id = 'voice-recognition-styles';
            style.textContent = `
                .input-group-voice {
                    position: relative;
                    display: flex;
                    align-items: center;
                    width: 100%;
                }
                .btn-voice {
                    margin-left: 5px;
                    padding: 6px 10px;
                    border-radius: 4px;
                    transition: all 0.3s ease;
                }
                .btn-voice i {
                    transition: all 0.3s ease;
                    font-size: 0.9em;
                }
                .btn-voice.listening {
                    animation: pulse 1.5s infinite;
                }
                @keyframes pulse {
                    0% { transform: scale(1); }
                    50% { transform: scale(1.1); }
                    100% { transform: scale(1); }
                }
            `;
            document.head.appendChild(style);
        }

        // Función para agregar botones de voz a los campos de texto
        function addVoiceButton(input) {
            // Verificar si el campo debe ser excluido
            if (shouldExcludeInput(input) || input.nextElementSibling?.classList?.contains('btn-voice')) {
                return;
            }

            const wrapper = document.createElement('div');
            wrapper.className = 'input-group-voice';
            
            // Mover el input al wrapper
            input.parentNode.insertBefore(wrapper, input);
            wrapper.appendChild(input);
            
            // Crear y agregar el botón de voz
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-outline-secondary btn-voice';
            button.title = 'Mantén presionado para hablar';
            button.innerHTML = '<i class="fas fa-microphone"></i>';
            
            // Iniciar grabación al presionar
            button.addEventListener('mousedown', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.speechController.startListening(input);
            });
            
            // Detener grabación al soltar
            button.addEventListener('mouseup', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.speechController.stopListening();
            });
            
            // Asegurarse de que se detenga si el mouse sale del botón
            button.addEventListener('mouseleave', (e) => {
                if (window.speechController.isListening) {
                    window.speechController.stopListening();
                }
            });
            
            // Manejar eventos táctiles para dispositivos móviles
            button.addEventListener('touchstart', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.speechController.startListening(input);
            });
            
            button.addEventListener('touchend', (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.speechController.stopListening();
            });
            
            wrapper.appendChild(button);
        }

        // Agregar botones a los campos de texto existentes
        document.querySelectorAll('input[type="text"], textarea').forEach(input => {
            if (!shouldExcludeInput(input)) {
                addVoiceButton(input);
            }
        });

        // Función para manejar elementos dinámicos (si es necesario)
        function handleDynamicElements() {
            document.querySelectorAll('input[type="text"]:not(.voice-button-added), textarea:not(.voice-button-added)').forEach(input => {
                if (!shouldExcludeInput(input) && !input.nextElementSibling?.classList?.contains('btn-voice')) {
                    input.classList.add('voice-button-added');
                    addVoiceButton(input);
                }
            });
        }

        // Observar cambios en el DOM para manejar elementos dinámicos
        const observer = new MutationObserver(handleDynamicElements);
        observer.observe(document.body, { 
            childList: true, 
            subtree: true 
        });
    }

    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initVoiceButtons);
    } else {
        initVoiceButtons();
    }
}
