<?php
use Qt\Widgets\QApplication;
use Qt\Widgets\QWidget;
use Qt\Widgets\QVBoxLayout;
use Qt\Widgets\QHBoxLayout;
use Qt\Widgets\QLineEdit;
use Qt\Widgets\QPushButton;
use Qt\Gui\QIcon;
use Qt\Gui\QPixmap;
use Qt\Gui\QFont;
use Qt\WebEngineWidgets\QWebEngineView;
use Qt\Core\QUrl;

class MyWebBrowser
{
    public function __construct()
    {
        $this->window = new QWidget();
        $this->window->setWindowTitle("Sk. Salahuddin - Morning 01 Batch");
        $this->layout = new QVBoxLayout();
        $this->horizontal = new QHBoxLayout();
        $this->search_bar = new QLineEdit();
        $this->search_bar->setPlaceholderText("Search Google");
        $this->search_bar->setMinimumHeight(50);
        $this->search_bar->setStyleSheet('
            QLineEdit {
                border: 2px solid #4a4a4a;
                border-radius: 25px;
                padding-left: 15px;
                padding-right: 50px;
                font-size: 18px;
                font-family: Arial;
            }
            QLineEdit:focus {
                border: 2px solid #0080ff;
            }
        ');
        $this->go_btn = new QPushButton("GO");
        $this->go_btn->setIcon(new QIcon(new QPixmap("go.png")));
        $this->go_btn->setIconSize(new QSize(32, 32));
        $this->go_btn->setMinimumHeight(50);
        $this->go_btn->setFixedSize(new QSize(50, 50));
        $this->go_btn->setStyleSheet('
            QPushButton {
                border: none;
                background-color: #0080ff;
                border-radius: 25px;
            }
            QPushButton:hover {
                background-color: #005ce6;
            }
            QPushButton:pressed {
                background-color: #0047b3;
            }
        ');
        $this->back_btn = new QPushButton("<");
        $this->back_btn->setIcon(new QIcon(new QPixmap("back.png")));
        $this->back_btn->setIconSize(new QSize(32, 32));
        $this->back_btn->setMinimumHeight(50);
        $this->back_btn->setFixedSize(new QSize(50, 50));
        $this->back_btn->setStyleSheet('
            QPushButton {
                border: none;
                background-color: #4a4a4a;
                border-radius: 25px;
            }
            QPushButton:hover {
                background-color: #333333;
            }
            QPushButton:pressed {
                background-color: #1a1a1a;
            }
        ');
        $this->forward_btn = new QPushButton(">");
        $this->forward_btn->setIcon(new QIcon(new QPixmap("forward.png")));
        $this->forward_btn->setIconSize(new QSize(32, 32));
        $this->forward_btn->setMinimumHeight(50);
        $this->forward_btn->setFixedSize(new QSize(50, 50));
        $this->forward_btn->setStyleSheet('
            QPushButton {
                border: none;
                background-color: #4a4a4a;
                border-radius: 25px;
            }
            QPushButton:hover {
                background-color: #333333;
            }
            QPushButton:pressed {
                background-color: #1a1a1a;
            }
        ');
        $this->horizontal->addWidget($this->search_bar);
        $this->horizontal->addWidget($this->go_btn);
        $this->horizontal->addWidget($this->back_btn);
        $this->horizontal->addWidget($this->forward_btn);
        $this->browser = new QWebEngineView();
        $this->go_btn->clicked->connect(function () {
            $this->navigate($this->search_bar->text());
        });
        $this->back_btn->clicked->connect($this->browser, 'back');
        $this->forward_btn->clicked->connect($this->browser, 'forward');
        $this->search_bar->returnPressed->connect(function () {
            $this->navigate($this->search_bar->text());
        });
        $this->layout->addLayout($this->horizontal);
        $this->layout->addWidget($this->browser);
        $this->browser->setUrl(new QUrl("https://www.google.com/"));
        $this->window->setLayout($this->layout);
        $this->window->show();
    }
    public function navigate($url)
    {
        if (!str_starts_with($url, "http")) {
            $url = "https://www.google.com/search?q=" . $url;
            $this->search_bar->setText($url);
        }
        $this->browser->setUrl(new QUrl($url));
    }
}

$app = new QApplication([]);
$window = new MyWebBrowser();
$app->exec();
?>
