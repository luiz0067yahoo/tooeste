import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BlockNews2Component } from './block-news2.component';

describe('BlockNews2Component', () => {
  let component: BlockNews2Component;
  let fixture: ComponentFixture<BlockNews2Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BlockNews2Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(BlockNews2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
