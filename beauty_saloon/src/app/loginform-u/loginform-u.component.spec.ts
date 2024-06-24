import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LoginformUComponent } from './loginform-u.component';

describe('LoginformUComponent', () => {
  let component: LoginformUComponent;
  let fixture: ComponentFixture<LoginformUComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [LoginformUComponent]
    });
    fixture = TestBed.createComponent(LoginformUComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
