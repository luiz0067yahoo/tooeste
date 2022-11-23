import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BlockNewsTopVewsComponent } from './block-news-top-vews.component';

describe('BlockNewsTopVewsComponent', () => {
  let component: BlockNewsTopVewsComponent;
  let fixture: ComponentFixture<BlockNewsTopVewsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BlockNewsTopVewsComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(BlockNewsTopVewsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
