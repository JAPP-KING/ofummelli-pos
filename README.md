
# Sistema POS para @OfumMelliBodegon

Este sistema de Punto de Venta (POS) ha sido desarrollado especialmente para el restaurante @OfumMelliBodegon, ubicado en Artigas. Permite llevar el control de las ventas, inventario, caja y usuarios (cajero, barrero, administrador), todo desde varias PCs con Windows.

---

## 🚀 Requisitos del sistema

Antes de instalar este sistema en una PC del restaurante, asegúrate de tener lo siguiente:

- **Windows 10 o superior**
- **XAMPP** instalado (con Apache y MySQL)
- **Git** instalado
- **PHP 8.1 o superior**
- **Composer** instalado (https://getcomposer.org/)
- Navegador (Chrome recomendado)

---

## 🔧 Instalación paso a paso

### 1. Clona el repositorio

Abre la terminal (CMD o PowerShell) y escribe:

```bash
cd C:\xampp\htdocs
git clone https://github.com/JAPP-KING/ofummelli-pos.git
```

### 2. Entra al proyecto

```bash
cd ofummelli-pos
```

### 3. Instala las dependencias de PHP

```bash
composer install
```

### 4. Crea el archivo de configuración `.env`

```bash
copy .env.example .env
```

### 5. Genera la clave del sistema Laravel

```bash
php artisan key:generate
```

### 6. Crea una base de datos en **phpMyAdmin**

- Abre tu navegador y ve a: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Crea una nueva base de datos con el nombre: `ofum_pos`

### 7. Configura las credenciales en el archivo `.env`

Edita el archivo `.env` y cambia estas líneas según tu configuración:

```
DB_DATABASE=ofum_pos
DB_USERNAME=root
DB_PASSWORD=
```

(Nota: el campo de contraseña suele estar vacío por defecto en XAMPP)

### 8. Ejecuta las migraciones

Esto crea las tablas necesarias en la base de datos:

```bash
php artisan migrate
```

### 9. (Opcional) Llena la base de datos con datos de ejemplo

```bash
php artisan db:seed
```

---

## 💻 Cómo usar el sistema

1. Asegúrate de tener **Apache** y **MySQL** activos en XAMPP.
2. Abre tu navegador y visita:

```
http://localhost/ofummelli-pos/public
```

3. Inicia sesión con uno de los siguientes usuarios (ejemplo):

- **Administrador**
  - Usuario: admin@ofum.com
  - Contraseña: admin123

- **Cajero**
  - Usuario: cajero@ofum.com
  - Contraseña: cajero123

- **Barrero**
  - Usuario: barrero@ofum.com
  - Contraseña: barrero123

(Puedes cambiar o crear más usuarios desde el panel de administración)

---

## 🔄 Cómo actualizar el sistema

Cuando se realicen cambios y subidas nuevas al repositorio:

```bash
cd C:\xampp\htdocs\ofummelli-pos
git pull origin main
composer install
php artisan migrate
```

---

## 👨‍💻 Autor

Desarrollado por **José Peña (@JAPP-KING)** para el restaurante @OfumMelliBodegon  
Contacto: japp.king.dev@gmail.com

---

## 📌 Nota

Este sistema aún puede estar en desarrollo. Se recomienda hacer respaldos frecuentes de la base de datos y del sistema.
