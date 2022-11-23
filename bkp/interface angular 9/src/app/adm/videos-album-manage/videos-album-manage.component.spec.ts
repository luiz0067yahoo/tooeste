import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VideosAlbumManageComponent } from './videos-album-manage.component';

describe('VideosAlbumManageComponent', () => {
  let component: VideosAlbumManageComponent;
  let fixture: ComponentFixture<VideosAlbumManageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ VideosAlbumManageComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(VideosAlbumManageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
