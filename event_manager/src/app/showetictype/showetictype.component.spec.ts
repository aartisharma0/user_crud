import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ShowetictypeComponent } from './showetictype.component';

describe('ShowetictypeComponent', () => {
  let component: ShowetictypeComponent;
  let fixture: ComponentFixture<ShowetictypeComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ShowetictypeComponent]
    });
    fixture = TestBed.createComponent(ShowetictypeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
