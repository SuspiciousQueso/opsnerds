# OpsNerds Modules

OpsNerds is part of a larger idea: **MSPGuild**.

This file exists to document current and future modules so the ecosystem
doesn’t turn into a pile of half-connected features.

---

## Current Module

### OpsNerds
**Infrastructure & operations work**

- Infrastructure-only job posting
- Operators matched with real ops work
- Clear scopes, clear expectations
- No unrelated job types
- No creative or marketing work

If it runs, routes, stores, authenticates, or breaks — it belongs here.

---

## Planned / Conceptual Modules

These may or may not exist yet.
Naming them early is intentional.

### RackRoom
Physical infrastructure, installs, wiring, racks, hardware, datacenters.

### PatchDay
Maintenance, patching, upgrades, lifecycle work, security hygiene.

### NightWatch
On-call work, incident response, emergency remediation.

### Baseline
Audits, documentation, cleanup, “what do we actually have here?” projects.

---

## Shared Principles

All modules must:
- serve a specific operational purpose
- stay focused
- integrate cleanly
- avoid feature creep
- respect the operator’s time

If a module can’t stand on its own, it doesn’t get built.

---

## Integration Philosophy

Modules may share:
- identity
- reputation
- historical context

Modules do NOT share:
- bloated dependencies
- UI assumptions
- forced workflows

Loose coupling beats clever coupling.
