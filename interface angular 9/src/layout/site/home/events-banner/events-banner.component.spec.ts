import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EventsBannerComponent } from './events-banner.component';

describe('EventsBannerComponent', () => {
  let component: EventsBannerComponent;
  let fixture: ComponentFixture<EventsBannerComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EventsBannerComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EventsBannerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
