document.addEventListener('DOMContentLoaded', () => {
    fetchAuctions();

    // Update timers every second
    setInterval(updateTimers, 1000);
});

async function fetchAuctions() {
    try {
        const response = await fetch('php/get_auction.php');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const auctions = await response.json();
        console.log('Fetched auctions:', auctions);

        const auctionList = document.getElementById('auction-list');
        auctionList.innerHTML = '';

        if (auctions.length === 0) {
            auctionList.innerHTML = '<p>No active auctions available at the moment.</p>';
            return;
        }

        auctions.forEach(item => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('auction-item');
            itemDiv.style.border = '1px solid #ddd';
            itemDiv.style.borderRadius = '8px';
            itemDiv.style.padding = '15px';
            itemDiv.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';
            itemDiv.style.backgroundColor = '#fafafa';

            // Use placeholder if image filename is missing or empty
            const imageName = item.image && item.image.trim() !== '' ? item.image : 'placeholder.png';
            const imageSrc = `images/${imageName}`;

            itemDiv.innerHTML = `
                <h3>${item.title}</h3>
                <img src="${imageSrc}" alt="${item.title}" onerror="this.onerror=null;this.src='images/placeholder.png';">
                <p>${item.description}</p>
                <p>Starting Price: $${item.starting_price}</p>
                <p>Current Bid: $${item.current_bid || item.starting_price}</p>
                <p style="font-weight: bold; color: #333;">Time Left: <span class="timer" data-end="${item.end_time}"></span></p>
                <form onsubmit="placeBid(event, ${item.id})" style="display: flex; flex-direction: column; gap: 10px;">
                    <input type="number" name="bid_amount" step="0.01" placeholder="Enter bid" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 1rem;">
                    <button type="submit" style="background-color: black; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; margin-top: 5px;">Place Bid</button>
                </form>
            `;
            auctionList.appendChild(itemDiv);
        });

        updateTimers();
    } catch (error) {
        console.error('Failed to fetch auctions:', error);
        const auctionList = document.getElementById('auction-list');
        auctionList.innerHTML = '<p>Failed to load auctions. Please try again later.</p>';
    }
}

function updateTimers() {
    const timers = document.querySelectorAll('.timer');
    timers.forEach(timer => {
        const endTime = new Date(timer.dataset.end).getTime();
        const now = new Date().getTime();
        const timeLeft = endTime - now;

        if (timeLeft <= 0) {
            timer.textContent = 'Auction Ended';
        } else {
            const hours = Math.floor(timeLeft / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
            timer.textContent = `${hours}h ${minutes}m ${seconds}s`;
        }
    });
}

async function placeBid(event, itemId) {
    event.preventDefault();
    const form = event.target;
    const bidAmount = form.bid_amount.value;

    const response = await fetch('php/bid.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `item_id=${itemId}&bid_amount=${bidAmount}`
    }).then(res => res.text());

    alert(response);
    fetchAuctions();
}
