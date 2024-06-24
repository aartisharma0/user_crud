import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ManageticketComponent } from './manageticket.component';

describe('ManageticketComponent', () => {
  let component: ManageticketComponent;
  let fixture: ComponentFixture<ManageticketComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ManageticketComponent]
    });
    fixture = TestBed.createComponent(ManageticketComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
