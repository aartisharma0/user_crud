import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ShoweticketComponent } from './showeticket.component';

describe('ShoweticketComponent', () => {
  let component: ShoweticketComponent;
  let fixture: ComponentFixture<ShoweticketComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ShoweticketComponent]
    });
    fixture = TestBed.createComponent(ShoweticketComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
