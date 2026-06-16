<?php
require __DIR__ . '/vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class FruitStoreServer implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Client Terhubung!\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Pesan diterima: $msg\n";
        // Mengirim balik pesan ke semua klien yang terhubung
        foreach ($this->clients as $client) {
            $client->send($msg);
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Client Terputus!\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}

// Menjalankan Server dengan mekanisme Error Handling
try {
    $server = IoServer::factory(
        new HttpServer(new WsServer(new FruitStoreServer())),
        8080, // Pastikan port ini tidak dipakai aplikasi lain
        '0.0.0.0'
    );
    
    echo "Server BERHASIL berjalan di 0.0.0.0:8080!\n";
    echo "Tekan Ctrl + C untuk mematikan server.\n";
    
    $server->run();
} catch (\Exception $e) {
    echo "Gagal menjalankan server: " . $e->getMessage() . "\n";
    echo "Pastikan port 8080 tidak sedang digunakan oleh aplikasi lain!\n";
}