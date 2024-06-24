import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AddexpertComponent } from './addexpert.component';

describe('AddexpertComponent', () => {
  let component: AddexpertComponent;
  let fixture: ComponentFixture<AddexpertComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [AddexpertComponent]
    });
    fixture = TestBed.createComponent(AddexpertComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
