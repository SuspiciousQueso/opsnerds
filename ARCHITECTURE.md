# OpsNerds Architecture

This document explains how OpsNerds is structured and why.

No buzzwords. No diagrams for the sake of diagrams.
Just the thinking behind the system.

---

## Design Goals

OpsNerds is built with a few non-negotiables in mind:

- It must be understandable six months from now
- It must not require a rewrite to scale
- It must support real infrastructure workflows
- It must integrate cleanly with MSPGuild
- It must also run perfectly fine on its own

This is infrastructure software. Stability matters more than cleverness.

---

## Modular by Intent

OpsNerds is a **module**, not a monolith.

That means:
- It can be deployed independently
- It owns its own domain logic
- It does not assume MSPGuild is present
- It *can* integrate with MSPGuild when available

Think of OpsNerds as a service that knows how to mind its own business.

---

## Identity & Authentication

OpsNerds supports two modes:

### Standalone Mode
- Local users
- Local auth
- Local profiles
- Self-contained reputation

### MSPGuild-Integrated Mode
- Shared identity
- Shared core profile data
- Ops-specific reputation remains local
- Cross-module trust becomes possible

The rule is simple:
> OpsNerds never breaks if MSPGuild isn’t there.

---

## Core Domains (Conceptual)

These are logical boundaries, not hard promises yet:

- Users / Operators
- Jobs (infra-only by design)
- Engagements / Work history
- Reputation (earned, not decorative)
- Messaging / coordination (minimal, purposeful)

Anything outside these domains is intentionally avoided.

---

## What This Is NOT

OpsNerds is not:
- a social network
- a chat-first platform
- a content site
- a general freelance marketplace

Those things introduce noise.
Noise kills ops work.

---

## Final Note

If something feels unclear, complicated, or fragile —
it probably doesn’t belong here.

This architecture is meant to survive real usage,
not impress a demo audience.
