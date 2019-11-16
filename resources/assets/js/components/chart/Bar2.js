import {Bar} from 'vue-chartjs'

export default Bar.extend({
  mounted () {
    this.renderChart({
      labels: ['ElSpace', 'Cojite', 'OpenFab'],
      datasets: [
        {
          label: 'Retweets',
          backgroundColor: '#f87979',
          data: [214, 1183, 112]
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
  }
})