/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        navy: {
          DEFAULT: '#0f172a',
          50: '#f8fafc',
          100: '#f1f5f9',
          200: '#e2e8f0',
          300: '#cbd5e1',
          400: '#94a3b8',
          500: '#64748b',
          600: '#475569',
          700: '#334155',
          800: '#0f172a', // Dark Navy
          900: '#080c17', // Deeper Navy
          950: '#04060c',
          dark: '#080c17',
          light: '#1e293b',
        },
        gold: {
          DEFAULT: '#d4af37',
          50: '#fefce8',
          100: '#fef9c3',
          200: '#fef08a',
          300: '#fde047',
          400: '#facc15', // Bright Gold
          500: '#d4af37', // Custom Luxury Gold
          600: '#b89222',
          700: '#8e6d15',
          800: '#6e5214',
          900: '#4a350e',
          light: '#fbf5b7',
          dark: '#aa771c',
        },
      },
      fontFamily: {
        serif: ['"Playfair Display"', 'Georgia', 'serif'],
        sans: ['Inter', 'system-ui', 'sans-serif'],
      },
      boxShadow: {
        'gold': '0 10px 25px -5px rgba(212, 175, 55, 0.2), 0 8px 10px -6px rgba(212, 175, 55, 0.2)',
        'gold-lg': '0 20px 35px -5px rgba(212, 175, 55, 0.3), 0 10px 15px -5px rgba(212, 175, 55, 0.2)',
      },
    },
  },
  plugins: [],
}
