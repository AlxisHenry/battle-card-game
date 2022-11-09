<a name="readme-top"></a>

<div align="center">


  <h1>Battle Card Game</h1>
  
  <p>
	Inspired by <a href="https://github.com/lardio">@lardio</a>  </p>

<a href="https://docs.alexishenry.eu"><strong>Getting Started »</strong></a>

<h4>
    <a href="https://docs.alexishenry.eu">Documentation </a>
  <span> · </span>
    <a href="https://github.com/AlxisHenry/battle-card-game /issues">Report a bug</a>
  <span> · </span>
    <a href="https://github.com/AlxisHenry/battle-card-game /issues">Partager une idée</a>
  </h4>
</div>

<br />

# :notebook_with_decorative_cover: Summary

- [About the project](#star2-about-the-project)
  * [Games](#black_jocker-games)
  * [Techs](#space_invader-techs)
- [Getting Started](#toolbox-getting-started)
  * [Requirements](#bangbang-requirements)
  * [Installation](#gear-installation)
  * [Tests](#test_tube-tests)
- [Authors](#wave-authors)

## :star2: About the project

### :black_joker: Games

**Games of 2 or 4 players only**

0. *Equitable distribution of cards between players.*

1. Each round, the players turn over a card, the strongest wins.

2. The winning player places their played card and the opponent's card at the end of their deck.

3. Battle: Each player places a card face down on the previous card, then plays a second card face up which will determine the winner. In the event of a tie, the process is repeated.

4. If a player cannot play more than two cards in the event of a tie, then the card following the tie will decide the winner.

5. If a player gets a tie and it's their last card then they lose.

### :space_invader: Techs

## :toolbox: Getting Started

### :bangbang: Requirements

- PHP >= 8.1

### :gear: Installation

**Clone the repository**

```bash
git clone https://github.com/AlxisHenry/battle-card-game.git
```

### :test_tube: Tests

**Check errors using [PHPStan](https://phpstan.org/)**

```bash
# pnpm
pnpm run phpstan
# npm
npm run phpstan
```

**Run tests using [PHPUnit](https://phpunit.de/)**

```bash
# pnpm
pnpm run tests
# npm
npm run tests
```

## :wave: Authors

* **Alexis Henry** _alias_ [@AlxisHenry](https://github.com/AlxisHenry)


<p align="right">(<a href="#readme-top">back to top</a>)</p>
