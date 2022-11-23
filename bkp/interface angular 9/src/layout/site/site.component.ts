import {Title} from "@angular/platform-browser";
import { Component, Input, OnInit, setTestabilityGetter } from '@angular/core';
import { DatePipe } from '@angular/common';
@Component({
  selector: 'app-site',
  templateUrl: './site.component.html',
  styleUrls: ['./site.component.scss'],
  providers: [DatePipe]
})
export class SiteComponent implements OnInit {
   data_atual = new Date();
  
   constructor(private titleService:Title) {
    this.titleService.setTitle("Some title");
  }

  ngOnInit(): void {
    this.titleService.setTitle("Tooeste Informação ao seu alcance")

  }

}
