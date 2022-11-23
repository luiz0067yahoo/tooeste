import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BlockNews3Component } from './block-news3.component';

describe('BlockNews3Component', () => {
  let component: BlockNews3Component;
  let fixture: ComponentFixture<BlockNews3Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BlockNews3Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(BlockNews3Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
