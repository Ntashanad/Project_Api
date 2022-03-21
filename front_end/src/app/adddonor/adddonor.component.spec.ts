import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdddonorComponent } from './adddonor.component';

describe('AdddonorComponent', () => {
  let component: AdddonorComponent;
  let fixture: ComponentFixture<AdddonorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AdddonorComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AdddonorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
