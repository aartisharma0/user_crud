import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdateticketComponent } from './updateticket.component';

describe('UpdateticketComponent', () => {
  let component: UpdateticketComponent;
  let fixture: ComponentFixture<UpdateticketComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [UpdateticketComponent]
    });
    fixture = TestBed.createComponent(UpdateticketComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
