import { Component, OnInit } from '@angular/core';
import { MenuComponent } from '../../componentes/menu/menu.component';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { RouterOutlet } from '@angular/router';
import { TableModule } from 'primeng/table';
import { CerrarsesionComponent } from '../../componentes/cerrarsesion/cerrarsesion.component';

@Component({
  selector: 'app-laboratorio',
  standalone: true,
  imports: [
    RouterOutlet,
    MenuComponent,
    CerrarsesionComponent,
    ReactiveFormsModule,
    TableModule
  ],
  templateUrl: './laboratorio.component.html'
})
export class LaboratorioComponent implements OnInit {


  constructor() {

  }

  ngOnInit(): void {
  }

  laboratorioForm = new FormGroup({
    dni_laboratorio: new FormControl({value:'', disabled: false}),
    nombre_laboratorio: new FormControl({value:'', disabled: true}),
    doctor_laboratorio: new FormControl(''),
    fecha_laboratorio: new FormControl({value:'', disabled: true}),
    Efectivo_laboratorio: new FormControl('0'),
    observacion_laboratorio: new FormControl(''),
    total_laboratorio: new FormControl({value:'', disabled: true}),
  });
}
