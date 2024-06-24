import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ManagetypeComponent } from './managetype.component';

describe('ManagetypeComponent', () => {
  let component: ManagetypeComponent;
  let fixture: ComponentFixture<ManagetypeComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ManagetypeComponent]
    });
    fixture = TestBed.createComponent(ManagetypeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
