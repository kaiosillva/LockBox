<div class='mx-auto mx-auto max-w-screen-lg'>

    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">LockBox</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a>👁️</a></li>
                <li>
                    <details>
                        <summary><?= $user->nome ?></summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li><a href='/logout'>logout</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex space-x-4 w-full">
        <form action="" class="w-full"> 
            <label class="input input-bordered flex items-center gap-2 w-full">
                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g
                        stroke-linejoin="round"
                        stroke-linecap="round"
                        stroke-width="2.5"
                        fill="none"
                        stroke="currentColor">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </g>
                </svg>
                <input type="search" class="grow" name="pesquisar" required placeholder="Pesquisar notas no LockBox..." />
            </label>
        </form>
        <a href="" class="btn btn-primary">
            + item
        </a>

    </div>


</div>