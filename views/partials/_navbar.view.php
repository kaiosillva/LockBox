    <div class="navbar bg-base-100">
      <div class="flex-1">
        <a href="/notas" class="btn btn-ghost text-xl">LockBox</a>
      </div>
      <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
          <?php if (session()->get('mostrar')): ?>
            <li><a href="/esconder">🫣</a></li>
          <?php else: ?>
            <li><a href="/mostrar">👁️</a></li>
          <?php endif; ?>
          <li>
            <details>
              <summary><?= auth()->nome ?></summary>
              <ul class="bg-base-100 rounded-t-none p-2">
                <li><a href='/logout'>logout</a></li>
              </ul>
            </details>
          </li>
        </ul>
      </div>
    </div>