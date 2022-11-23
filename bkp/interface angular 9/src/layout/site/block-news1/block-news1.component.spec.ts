import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BlockNews1Component } from './block-news1.component';

describe('BlockNews1Component', () => {
  let component: BlockNews1Component;
  let fixture: ComponentFixture<BlockNews1Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BlockNews1Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(BlockNews1Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
