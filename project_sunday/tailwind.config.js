module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
         'prompt':[ 'Prompt', 'sans-serif']
      },
      spacing: {
        '6px':'6px',
        '10px':'10px',
        '45px':'45px',
        '150px':'150px',
        '650px': '650px',
      },
      margin: {
        '6px':'6px',
        '10px':'10px',
        '45px':'45px',
        '150px':'150px',
        '650px': '650px',
        '350px': '350px',
        '300px': '300px',
        '20px':'20px'
      },
      width:{
        '94px':'94px',
        '100%':'100%',
        '90%':'90%',
        '320px':'320px',
        '350px':'350px',
        '300px':'300px',
        '380px':'380px',
        '400px':'400px',
        '500px':'500px',
        '540px':'540px',
        '568px':'578px',
        '600px':'600px',
        '640px':'640px',
        '150px':'150px',
        '100px':'100px',
        '1060px':'1060px',
        '1250px':'1250px',
        '1115px':'1115px',
        '1109px':'1109px',
        '1160px':'1160px',
        '10px': '10px',
        '20px': '20px',
        '25px':'25px',
        '30px':'30px',
        '50px':'50px',
        '250px':'250px',
        '240px':'240px',
        '200px':'200px',
        '80%':'80%',
        '145px':'145px',
        '28px':'28px'
      },
      height:{
        '20px':'20px',
        '24px':'24px',
        '30px':'30px',
        '40px':'40px',
        '45px':'45px',
        '50px':'50px',
        '60px':'60px',
        '150px':'150px',
        '272px':'272px',
        '477px':'477px',
        '476px':'476px',
        '974px':'974px',
        '200px':'200px',
        '400px':'400px',
        '350px':'350px',
        '250px':'250px',
        '500px':'500px',
        '1050px':'1050px',
        '950px':'950px',
        '26px':'26px'
      },
      fontSize: {
        '50px':'50px'
      },
      colors:{
        'EBEBEB':'#EBEBEB',
        'pink':'rgba(226, 137, 227, 1)',
        '220':'rgba(220, 220, 220, 1)',
        '235':'rgba(235, 233, 233, 1)',
        'green-000':'#48d4ac',
        '141':'rgba(141, 180, 255, 1)',
        '200':'rgba(200, 205, 253, 1)'
      },
      padding:{
        '15px':'65px'
      }
    },
  },
  themeVariants: ['dark'],
  plugins: [
    require('@tailwindcss/typography'),
  ],
}