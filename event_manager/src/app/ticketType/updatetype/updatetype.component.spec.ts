import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UpdatetypeComponent } from './updatetype.component';

describe('UpdatetypeComponent', () => {
  let component: UpdatetypeComponent;
  let fixture: ComponentFixture<UpdatetypeComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [UpdatetypeComponent]
    });
    fixture = TestBed.createComponent(UpdatetypeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
