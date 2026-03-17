# The Design Morgue

A WordPress Playground workshop on web design fundamentals. Five specimens. Five preventable deaths. You are the forensic designer.

## Launch the workshop

[Open in WordPress Playground →](https://playground.wordpress.net/?blueprint-url=https://cdn.jsdelivr.net/gh/JosVelasco/design-morgue@main/blueprint.json)

No install. No server. Runs entirely in the browser. Closing the tab destroys the environment.

Credentials: `admin` / `password`

---

## Case Files

| Exhibit | Crime | Design Principle |
|---------|-------|-----------------|
| A | The Mutilated Logo | Crop logos tight to their visual bounds |
| B | The Accent Color Massacre | Accent colors lose power when overused |
| C | The Pale Witness | Image quality signals brand quality |
| D | The Void | Whitespace communicates confidence and elegance |
| E | The Palette Paradox | Dark and light palettes are not interchangeable |

Design principles sourced from [Basic Web Design and Color Theory Tips](https://josvelasco.com/basic-web-design-and-color-theory-tips/).

---

## Contributing

This is a public workshop — contributions welcome.

- **New exhibits:** Add a new `Exhibit X` section to the `runPHP` step in `blueprint.json`
- **Images:** Add files to `images/` and reference them via raw GitHub URLs in the blueprint
- **Bug fixes:** The PHP inside `runPHP` uses single-quoted strings — no apostrophes allowed in content

See [`blueprint.json`](./blueprint.json) and [`mu-plugin.php`](./mu-plugin.php).
