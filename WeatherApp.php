<?php
use GuzzleHttp\Client;
use Qt\Widgets\QApplication;
use Qt\Widgets\QWidget;
use Qt\Widgets\QVBoxLayout;
use Qt\Widgets\QHBoxLayout;
use Qt\Widgets\QLabel;
use Qt\Widgets\QLineEdit;
use Qt\Widgets\QPushButton;
use Qt\Gui\QFont;
use Qt\Core\Qt;
use Qt\Core\QUrl;

class WeatherApp extends QWidget
{
    private $client;
    private $title_label;
    private $input_layout;
    private $input_label;
    private $input_edit;
    private $submit_button;
    private $weather_layout;
    private $temperature_label;
    private $description_label;

    public function __construct()
    {
        parent::__construct();
        $this->setWindowTitle('Sk. Salahuddin Morning 01 Batch');
        $this->setFixedSize(520, 270);
        $this->layout = new QVBoxLayout();
        $this->setLayout($this->layout);
        $this->title_label = new QLabel('Weather App');
        $this->title_label->setAlignment(Qt::AlignCenter);
        $this->title_label->setFont(new QFont('Arial', 18, QFont::Bold));
        $this->layout->addWidget($this->title_label);
        $this->input_layout = new QHBoxLayout();
        $this->input_label = new QLabel('Enter City Name:');
        $this->input_label->setFont(new QFont('Arial', 12));
        $this->input_edit = new QLineEdit();
        $this->input_edit->setFont(new QFont('Arial', 12));
        $this->input_layout->addWidget($this->input_label);
        $this->input_layout->addWidget($this->input_edit);
        $this->layout->addLayout($this->input_layout);
        $this->submit_button = new QPushButton('Submit');
        $this->submit_button->setFont(new QFont('Arial', 12));
        $this->submit_button->clicked->connect($this, 'update_weather');
        $this->layout->addWidget($this->submit_button);
        $this->weather_layout = new QVBoxLayout();
        $this->temperature_label = new QLabel();
        $this->temperature_label->setAlignment(Qt::AlignCenter);
        $this->temperature_label->setFont(new QFont('Arial', 14));
        $this->weather_layout->addWidget($this->temperature_label);
        $this->description_label = new QLabel();
        $this->description_label->setAlignment(Qt::AlignCenter);
        $this->description_label->setFont(new QFont('Arial', 14));
        $this->weather_layout->addWidget($this->description_label);
        $this->layout->addLayout($this->weather_layout);

        // Create the Guzzle HTTP client
        $this->client = new Client();
    }

    public function update_weather()
    {
        $city = $this->input_edit->text();
        $key = 'your_api_key'; // Replace with your OpenWeatherMap API key
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$key}&units=metric";

        try {
            $response = $this->client->request('GET', $url);
            $data = json_decode($response->getBody(), true);

            if (!isset($data['main'])) {
                $this->temperature_label->setText('City not found');
                $this->description_label->setText('');
            } else {
                $temp = $data['main']['temp'];
                $description = $data['weather'][0]['description'];
                $this->temperature_label->setText("Temperature: {$temp} °C");
                $this->description_label->setText("Description: " . ucfirst($description));
            }
        } catch (\Exception $e) {
            $this->temperature_label->setText('Error occurred');
            $this->description_label->setText('');
        }
    }
}

$app = new QApplication([]);
$weather_app = new WeatherApp();
$weather_app->show();
$app->exec();
?>
