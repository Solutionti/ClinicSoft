import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { MenuComponent } from '../../componentes/menu/menu.component';
import { CerrarsesionComponent } from '../../componentes/cerrarsesion/cerrarsesion.component';
import { RouterOutlet } from '@angular/router';
import { TableModule } from 'primeng/table';

@Component({
  selector: 'app-gastos',
  standalone: true,
  imports: [
    RouterOutlet,
    ReactiveFormsModule,
    MenuComponent,
    CerrarsesionComponent,
    TableModule
  ],
  templateUrl: './gastos.component.html'
})
export class GastosComponent implements OnInit {

  ngOnInit(): void {

  }
  gastosForm = new FormGroup({
    empresa_gastos: new FormControl(''),
    stock_gastos: new FormControl(''),
    cant_gastos: new FormControl(''),
    codigo_gastos: new FormControl(''),
    inicial_gastos: new FormControl(''),
    final_gastos: new FormControl(''),
  });
}
