/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/view/**/*.php", 
    "./public/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'blue-gray': {
          800: '#374151', // Misalnya, Anda dapat menyesuaikan warna di sini
          900: '#1f2937',
        },
        'green-tosca' : '#57baab',
        'salmon' : '#ff6d59',
        'yellow-tosca' : '#f6bb00',
      },
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
      }
    },
  },
  plugins: [],
}

