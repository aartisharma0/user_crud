import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';
import { UserauthService } from '../shared/userauth/userauth.service';
import { AngularFireAuth } from '@angular/fire/compat/auth';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class UserauthGuard implements CanActivate {

  constructor(
    private authservice: UserauthService,
    private route: Router,
    private afAuth: AngularFireAuth
  ) {}

  canActivate(): Observable<boolean> {
    return this.afAuth.authState.pipe(
      map(user => {
        if (!user) {
          return true; 
        } else {
          this.route.navigateByUrl("/login");
          return false; 
        }
      })
    );
  }
}
