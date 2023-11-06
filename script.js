// Datos de usuarios registrados
const usuariosRegistrados = [
  { correo: 'ejemplo1@gmail.com', contrasena: 'contrasena1' },
  { correo: 'ejemplo2@gmail.com', contrasena: 'contrasena2' },
  { correo: 'ejemplo3@gmail.com', contrasena: 'contrasena3' }
];

// Función para validar el correo
function validarCorreo(correo) {
  const expresiónRegular = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return expresiónRegular.test(correo);
}

// Función para validar credenciales
function validarCredenciales(correo, contrasena) {
  return usuariosRegistrados.some(usuario => usuario.correo === correo && usuario.contrasena === contrasena);
}

// Registro de usuarios
const formRegistro = document.getElementById('registrarse');
const correoRegistro = document.getElementById('correo');
const contrasenaRegistro = document.getElementById('contrasena');

formRegistro.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevenir el envío del formulario por defecto

  const correoValue = correoRegistro.value;
  const contrasenaValue = contrasenaRegistro.value;

  if (!validarCorreo(correoValue)) {
    alert('Ingrese un correo electrónico válido');
    return;
  }

  if (contrasenaValue.length < 8) {
    alert('La contraseña debe tener al menos 8 caracteres');
    return;
  }

  if (validarCredenciales(correoValue, contrasenaValue)) {
    alert('El usuario ya está registrado');
    return;
  }

  // Si todas las validaciones pasan, agrega al usuario a la lista
  usuariosRegistrados.push({ correo: correoValue, contrasena: contrasenaValue });
  alert('Usuario registrado con éxito');
});

// Inicio de sesión
const formInicioSesion = document.querySelector('.iniciarsesion form');
const correoInicioSesion = document.getElementById('correo');
const contrasenaInicioSesion = document.getElementById('contrasena');

formInicioSesion.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevenir el envío del formulario por defecto

  const correoValue = correoInicioSesion.value;
  const contrasenaValue = contrasenaInicioSesion.value;

  if (validarCredenciales(correoValue, contrasenaValue)) {
    alert('Inicio de sesión exitoso');
    // Redirige a una página de inicio de sesión exitoso o realiza otras acciones necesarias.
  } else {
    alert('Credenciales incorrectas. Por favor, inténtelo de nuevo.');
  }
});
