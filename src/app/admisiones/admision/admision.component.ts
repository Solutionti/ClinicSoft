import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { MenuComponent } from '../../componentes/menu/menu.component';
import { CerrarsesionComponent } from '../../componentes/cerrarsesion/cerrarsesion.component';
import { RouterOutlet } from '@angular/router';
import { TableModule } from 'primeng/table';

@Component({
  selector: 'app-admision',
  standalone: true,
  imports: [
    RouterOutlet,
    ReactiveFormsModule,
    MenuComponent,
    CerrarsesionComponent,
    TableModule
  ],
  templateUrl: './admision.component.html'
})
export class AdmisionComponent implements OnInit {

  ngOnInit(): void {

  }

  admisionForm: FormGroup = new FormGroup({
    dni_admision: new FormControl(''),
    hc_admision: new FormControl(''),
    si_admision: new FormControl(''),
    no_admision: new FormControl(''),
    nombre_admision: new FormControl(''),
    especialidad_admision: new FormControl(''),
    doctor_admision: new FormControl(''),
  });

  admisionForm2: FormGroup = new FormGroup({
    fecha_admision: new FormControl(''),
    factura_admision: new FormControl(''),
    costo_admision: new FormControl(''),
    descuento_admision: new FormControl(''),
    comision_admision: new FormControl(''),
    recibida_admision: new FormControl(''),
    devolver_admision: new FormControl(''),
    efectivo_admision: new FormControl(''),
    tarjeta_admision: new FormControl(''),
    total_admision: new FormControl('')
  });

}
