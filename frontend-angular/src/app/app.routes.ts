import { Routes } from '@angular/router';

import { ShowcasePageComponent } from './features/showcase/showcase-page.component';

export const appRoutes: Routes = [
  { path: '', pathMatch: 'full', redirectTo: 'showcase' },
  { path: 'showcase', component: ShowcasePageComponent }
];
