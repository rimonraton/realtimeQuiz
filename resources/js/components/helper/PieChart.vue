<script>
  import { Pie } from 'vue-chartjs'

  export default {
    extends: Pie,
    props:['ans', 'qoptions'],
    data () {
      return {
        chartData: {
          labels: this.qoptions.map(o => { return o.option }),
          datasets: [{
              borderWidth: 1,
              borderColor: [
              '#7fdbda',
              '#ade498',
              '#ede682',
              '#febf63'            
              ],
              backgroundColor: [
              '#7fdbda',
              '#ade498',
              '#ede682',
              '#febf63',                
              ],
              data: this.ans
            }]
        },
        options: {
          legend: {
            display: true
          },
          responsive: true,
          maintainAspectRatio: false
        }
      }
    },
    mounted () {
      this.renderChart(this.chartData, this.options)
    },
    

  };
</script>