# Crown-Protocol-Generator
A simple Wordpress plugin to create NFT protocols on the Crown blockchain.

## Installation guide
You need a VPS with (recommended) 2GB RAM, 1 CPU Core and 20GB hard drive.

Download and install the current Crown daemon and bootstrap to the server (remove -b for no bootstrap)
```
sudo apt-get install curl -y && curl -s https://raw.githubusercontent.com/Crowndev/crowncoin/master/scripts/crown-server-install.sh | bash -s -b
```

Edit /root/.crown/crown.conf to include your RPC details.

Send a tiny amount of Crown to the daemon, for example (0.01). 

Place the crown_de1 folder inside the root web directory.

Place the crown-protocol-generator folder inside wp-content/plugins

Change all RPC details and website server info to your own.

Use the shortcode [crw_registration1] to show the protocol generator.

Note: nftRegSign is set to 3 (SignPayer) by default.