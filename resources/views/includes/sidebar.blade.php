<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Admin: {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a href="/">Visit Site</a>
                </li>
                <li>
                    <a href="/admin">Dashboard</a>
                </li>
                <li>
                    <a href="/admin/posts">Posts</a>
                </li>
                <li>
                    <a href="/admin/artists">Artists</a>
                </li>
            </ul>
        </div>