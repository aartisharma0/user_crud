import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdateexpertComponent } from './updateexpert.component';

describe('UpdateexpertComponent', () => {
  let component: UpdateexpertComponent;
  let fixture: ComponentFixture<UpdateexpertComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [UpdateexpertComponent]
    });
    fixture = TestBed.createComponent(UpdateexpertComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
