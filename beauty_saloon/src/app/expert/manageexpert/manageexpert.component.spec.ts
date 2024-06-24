import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ManageexpertComponent } from './manageexpert.component';

describe('ManageexpertComponent', () => {
  let component: ManageexpertComponent;
  let fixture: ComponentFixture<ManageexpertComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ManageexpertComponent]
    });
    fixture = TestBed.createComponent(ManageexpertComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
