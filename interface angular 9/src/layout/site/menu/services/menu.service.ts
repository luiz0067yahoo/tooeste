import { take } from 'rxjs/operators';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { BaseRestService } from 'src/app/shared/services/base-rest.service';
import { Menu } from '../models/menus.model';
import { ResponseServerDataJson } from 'src/app/shared/models/response-server-data-Json.model';


@Injectable({
  providedIn: 'root'
})
export class MenuService extends BaseRestService {

  public countSaved: number = 0;

  public buscarTodos(): Observable<any> {
    return this.getter<ResponseServerDataJson>('menus').pipe(take(1));
  }

  public buscarPorId(id: number): Observable<any> {
    return this.getter<ResponseServerDataJson>(`menus/${id}`).pipe(take(1));
  }

  public salvar(model: Menu): Observable<any> {
    this.countSaved++;
    // Verifica se o cliente já tem ID, se tiver chama o PUT para atual, senão o POST para inserir
    if (model.id) {
      model.dateUpdate = new Date();
      return this.put<ResponseServerDataJson>(`menus/${model.id}`, model);
    } else {
      model.dateInsert = new Date();
      return this.post<ResponseServerDataJson>('menus', model);
    }
  }

  public excluir(id: number): Observable<void> {
    return this.delete(`menus/${id}`).pipe(take(1));
  }


}
