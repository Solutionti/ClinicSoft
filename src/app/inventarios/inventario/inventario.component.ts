import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { MenuComponent } from '../../componentes/menu/menu.component';
import { CerrarsesionComponent } from '../../componentes/cerrarsesion/cerrarsesion.component';
import { RouterOutlet } from '@angular/router';
import { TableModule } from 'primeng/table';

@Component({
  selector: 'app-inventario',
  standalone: true,
  imports: [
    RouterOutlet,
    ReactiveFormsModule,
    MenuComponent,
    CerrarsesionComponent,
    TableModule
  ],
  templateUrl: './inventario.component.html'
})
export class InventarioComponent  implements OnInit {

  ngOnInit(): void {

  }

  inventarioForm = new FormGroup({
    empresa_inventario: new FormControl(''),
    stock_inventario: new FormControl(''),
    cant_inventario: new FormControl(''),
    codigo_inventario: new FormControl(''),
    inicial_inventario: new FormControl(''),
    final_inventario: new FormControl(''),
  })
}
