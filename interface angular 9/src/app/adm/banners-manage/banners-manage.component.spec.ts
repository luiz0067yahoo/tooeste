import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BannersManageComponent } from './banners-manage.component';

describe('BannersManageComponent', () => {
  let component: BannersManageComponent;
  let fixture: ComponentFixture<BannersManageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BannersManageComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(BannersManageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
