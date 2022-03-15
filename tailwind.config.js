const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
  content: ['./dist/*.html'],
  theme: {
    extend: {
      fontFamily: {
         'prompt':[ 'Prompt', 'sans-serif']
      },
      spacing: {
        '6px':'6px',
        '45px':'45px',
        '150px':'150px',
        '650px': '650px',

      },
      margin: {
        '6px':'6px',
        '45px':'45px',
        '150px':'150px',
        '650px': '650px',

      },
      width:{
        '100%':'100%',
        '90%':'90%',
        '350px':'350px',
        '380px':'380px',
        '400px':'400px',
        '500px':'500px',
        '600px': '500px',
        '150px':'150px',
        '100px':'100px',
        '1060px':'1060px',
        '1250px':'1250px',
        '10px': '10px',
        '20px': '20px',
        '250px':'250px',
        '200px':'200px',
        '80%':'80%'

        
      },
      height:{
        '20px':'20px',
        '30px':'30px',
        '40px':'40px',
        '45px':'45px',
        '50px':'50px',
        '60px':'60px',
        '150px':'150px'
      },
      fontSize: {
        '50px':'50px'
      },
      colors:{
        'EBEBEB':'#EBEBEB',
        'pink':'rgba(226, 137, 227, 1)'
      }
    },
  },
  plugins: [require('@tailwindcss/typography')],
}
