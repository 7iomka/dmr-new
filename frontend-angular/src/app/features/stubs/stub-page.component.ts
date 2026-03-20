import { Component, computed, inject } from '@angular/core';
import { ActivatedRoute, RouterLink } from '@angular/router';
import { ButtonModule } from 'primeng/button';

@Component({
  selector: 'app-stub-page',
  standalone: true,
  imports: [ButtonModule, RouterLink],
  template: `
    <section class="space-y-4">
      <h1 class="text-2xl font-bold tracking-tight text-surface-900 dark:text-surface-50 lg:text-3xl">{{ title() }}</h1>
      <p class="text-sm font-medium text-surface-500">Раздел подготовлен как route-stub для поэтапной миграции. Контент будет перенесён из legacy PHP в следующих итерациях.</p>
      <div>
        <a routerLink="/dashboard" pButton type="button" severity="secondary" variant="outlined">Вернуться к дашборду</a>
      </div>
    </section>
  `
})
export class StubPageComponent {
  private readonly route = inject(ActivatedRoute);
  protected readonly title = computed(() => (this.route.snapshot.data['title'] as string | undefined) ?? 'Раздел');
}
