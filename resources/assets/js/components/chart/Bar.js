// import 'chart.js'
import {Bar} from 'vue-chartjs'

export default Bar.extend({
  mounted () {
    this.renderChart({
      labels: ['without hashtags', '1 hashtags', '2 hashtags', '3 hashtags'],
      datasets: [
        {
          label: 'tweets',
          backgroundColor: '#f87979',
          data: [102, 55, 45, 30]
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
  }
})
