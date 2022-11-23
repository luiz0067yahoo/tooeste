import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PhotosAlbumManageComponent } from './photos-album-manage.component';

describe('PhotosAlbumManageComponent', () => {
  let component: PhotosAlbumManageComponent;
  let fixture: ComponentFixture<PhotosAlbumManageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PhotosAlbumManageComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(PhotosAlbumManageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
