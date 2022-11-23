import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BannersTypeManageComponent } from './banners-type-manage.component';

describe('BannersTypeManageComponent', () => {
  let component: BannersTypeManageComponent;
  let fixture: ComponentFixture<BannersTypeManageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BannersTypeManageComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(BannersTypeManageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
