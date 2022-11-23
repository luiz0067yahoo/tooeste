import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VideosManageComponent } from './videos-manage.component';

describe('VideosManageComponent', () => {
  let component: VideosManageComponent;
  let fixture: ComponentFixture<VideosManageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ VideosManageComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(VideosManageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
