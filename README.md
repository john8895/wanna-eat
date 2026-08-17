# 今天要吃啥？ (Wanna Eat)

Office lunch group-ordering system — solves two daily headaches: **what to order** and **who hasn't paid**.

> Built over 360 hours of after-work coding. Started with LocalStorage (v1), then upgraded to a full MySQL backend (v2).

## Demo

**https://eat.ahan-home.com/**

Test account: `abc` / `abc`

## Features

- **Restaurant management** — add / edit / delete restaurants with tags
- **Group orders** — create a daily order, pick a restaurant, collect entries from coworkers
- **Auto-tally** — identical items are grouped and counted automatically
- **Payment tracking** — mark who paid, see outstanding balances at a glance
- **Order history** — browse past orders by date

## Tech Stack

| Layer | Tech |
|-------|------|
| Backend | PHP + Smarty Template |
| Database | MySQL |
| Frontend | Vue 3 + AJAX |
| Auth | Session-based login |

## Getting Started

```bash
git clone https://github.com/john8895/wanna-eat.git
# Import sql/*.sql into your MySQL server
# Configure DB connection in config
# Serve with Apache/Nginx + PHP
```

## License

GNU GPLv3
