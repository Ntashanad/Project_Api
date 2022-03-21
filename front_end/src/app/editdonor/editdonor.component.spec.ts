import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditdonorComponent } from './editdonor.component';

describe('EditdonorComponent', () => {
  let component: EditdonorComponent;
  let fixture: ComponentFixture<EditdonorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditdonorComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditdonorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
