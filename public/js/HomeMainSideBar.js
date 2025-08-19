 document.getElementById('toggle-btn').addEventListener('click', () => {
      document.getElementById('sidebar').classList.toggle('collapsed');
    });

    // Menú usuario
    const userIcon = document.getElementById('user-icon');
    const userMenu = document.getElementById('user-menu');
    userIcon.addEventListener('click', () => {
      userMenu.style.display = (userMenu.style.display === 'block') ? 'none' : 'block';
    });
    document.addEventListener('click', (e) => {
      if (!userIcon.contains(e.target) && !userMenu.contains(e.target)) {
        userMenu.style.display = 'none';
      }
    });